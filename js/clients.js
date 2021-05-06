$(document).ready(() => {
    rafraichir_liste_clients();
});

const rafraichir_liste_clients = () => {
    $.ajax({
        url: './traitement/liste-clients.php',
        method: 'GET'
    }).done(data => {
        let jsonData = JSON.parse(data);
        let table = $('table');

        jsonData.length === 0 ? table.hide() : table.show();

        $('tbody').html('');
        jsonData.forEach(line => {
            $('tbody').append(`<tr>
                                <th scope="row">${line.id}</th>
                                <td>${line.nom}</td>
                                <td>${line.prenom}</td>
                                <td>${line.adresse}</td>
                                <td>${line.cp}</td>
                                <td>${line.ville}</td>
                                <td>${line.date}</td>
                                <td>
                                    <a href="maj-client.php?id=${line.id}" class="me-1"><i class="far fa-edit fa-lg"></i></a>
                                    <button onclick="supprimer_client(${line.id})"><i class="far fa-trash-alt fa-lg"></i></button>
                                </td>
                               </tr>`);
        });
    });
}

const supprimer_client = (id) => {
    $.ajax({
        url: './traitement/supprimer-client.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id
        },
        success: () => {
            $('.common-alert > span').text('Client supprimé avec succès !');
            $('.common-alert').addClass('alert-success').show();
        },
        error: () => {
            $('.common-alert > span').text('Une erreur est survenue, veuillez  réessayer.');
            $('.common-alert').addClass('alert-danger').show();
        }
    }).always(rafraichir_liste_clients);
}