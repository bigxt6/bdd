$(document).ready(() => {
    $('.client-pret-input').select2({
        theme: 'bootstrap4',
        ajax: {
            url: './traitement/liste-clients.php',
            type: 'GET',
            dataType: 'json',
            data: (params) => {
                return {
                    query: params.term,
                    minifiedList: true
                }
            },
            processResults: (data) => {
                return {
                    results: $.map(data, (o) => {
                        return {
                            id: o.id,
                            text: o.name
                        }
                    })
                }
            }
        }
    });

    $('.ouvrage-pret-input').select2({
        theme: 'bootstrap4',
        ajax: {
            url: './traitement/liste-ouvrages.php',
            type: 'GET',
            dataType: 'json',
            data: (params) => {
                return {
                    query: params.term,
                    onlyAvailable: true,
                    minifiedList: true
                }
            },
            processResults: (data) => {
                return {
                    results: $.map(data, (o) => {
                        return {
                            id: o.id,
                            text: o.name
                        }
                    })
                }
            }
        }
    });

    $('.client-rendu-input').select2({
        theme: 'bootstrap4',
        ajax: {
            url: './traitement/liste-clients.php',
            type: 'GET',
            dataType: 'json',
            data: (params) => {
                return {
                    query: params.term,
                    onlyBorrower: true,
                    minifiedList: true
                }
            },
            processResults: (data) => {
                return {
                    results: $.map(data, (o) => {
                        return {
                            id: o.id,
                            text: o.name
                        }
                    })
                }
            }
        }
    });

    $('.ouvrage-rendu-input').select2({
        theme: 'bootstrap4',
        ajax: {
            url: './traitement/liste-ouvrages.php',
            type: 'GET',
            dataType: 'json',
            data: (params) => {
                return {
                    query: params.term,
                    onlyDisable: true,
                    minifiedList: true
                }
            },
            processResults: (data) => {
                return {
                    results: $.map(data, (o) => {
                        return {
                            id: o.id,
                            text: o.name
                        }
                    })
                }
            }
        }
    });

    $('.client-rendu-input, .ouvrage-rendu-input').on('change', rafraichir_liste_prets);

    $('#ajouter-pret').click(() => {
        ajouter_pret($('.client-pret-input').val(), $('.ouvrage-pret-input').val());
    })
});

const ajouter_pret = (clientId, ouvrageId) => {
    if (!clientId || !ouvrageId) {
        return;
    }

    $.ajax({
        url: './traitement/ajout-pret.php',
        type: 'POST',
        dataType: 'json',
        data: {
            client_id: clientId,
            ouvrage_id: ouvrageId
        },
        success: () => {
            $('.alert > span').text('Prêt ajouté avec succès !');
            $('.alert').addClass('alert-success').show();
        },
        error: () => {
            $('.alert > span').text('Une erreur est survenue, veuillez  réessayer.');
            $('.alert').addClass('alert-danger').show();
        }
    }).always(() => {
        $('.client-pret-input').val('null').trigger('change');
        $('.ouvrage-pret-input').val('null').trigger('change');
    });
}

const rafraichir_liste_prets = () => {
    $.ajax({
        url: './traitement/liste-prets.php',
        method: 'GET',
        data: {
            client_id: $('.client-rendu-input').val(),
            ouvrage_id: $('.ouvrage-rendu-input').val(),
            onlyCurrent: true,
            minifiedList: true
        }
    }).done(data => {
        let jsonData = JSON.parse(data);
        let table = $('table');

        jsonData.length === 0 ? table.hide() : table.show();

        $('tbody').html('');
        jsonData.forEach(line => {
            $('tbody').append(`<tr>
                                <td>${line.prenom}</td>
                                <td>${line.nom}</td>
                                <td>${line.titre}</td>
                                <td>${line.date}</td>
                                <td><button onclick="enregistrer_rendu(${line.id})" class="btn btn-success btn-sm">Rendre</button></td>
                               </tr>`);
        });
    });
}