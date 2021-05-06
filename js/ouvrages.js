$(document).ready(() => {
    rafraichir_liste_ouvrages();
});

const rafraichir_liste_ouvrages = () => {
    $.ajax({
        url: './traitement/liste-ouvrages.php',
        method: 'GET'
    }).done(data => {
        let jsonData = JSON.parse(data);
        let table = $('table');

        jsonData.length === 0 ? table.hide() : table.show();

        $('tbody').html('');
        jsonData.forEach(line => {
            $('tbody').append(`<tr>
                                <th scope="row">${line.id}</th>
                                <td>${line.titre}</td>
                                <td>${line.auteur}</td>
                                <td>${line.date}</td>
                                <td>${line.editeur}</td>
                                <td>${line.isbn}</td>
                                <td>
                                    <a href="maj-ouvrage.php?id=${line.id}" class="me-1"><i class="far fa-edit fa-lg"></i></a>
                                    <button onclick="supprimer_ouvrage(${line.id})"><i class="far fa-trash-alt fa-lg"></i></button>
                                </td>
                               </tr>`);
        });
    });
}

const supprimer_ouvrage = (id) => {
    $.ajax({
        url: './traitement/supprimer-ouvrage.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id
        },
        success: () => {
            $('.common-alert > span').text('Ouvrage supprimé avec succès !');
            $('.common-alert').addClass('alert-success').show();
        },
        error: () => {
            $('.common-alert > span').text('Une erreur est survenue, veuillez  réessayer.');
            $('.common-alert').addClass('alert-danger').show();
        }
    }).always(rafraichir_liste_ouvrages);
}
