$(document).ready(() => {
    rafraichir_liste_prets();
});

const rafraichir_liste_prets = () => {
    $.ajax({
        url: './traitement/liste-prets.php',
        method: 'GET'
    }).done(data => {
        let jsonData = JSON.parse(data);
        let table = $('table');

        jsonData.length === 0 ? table.hide() :table.show();

        $('tbody').html('');
        jsonData.forEach(line => {
            $('tbody').append(`<tr>
                                <td>${line.id}</td>
                                <td>${line.prenom}</td>
                                <td>${line.nom}</td>
                                <td>${line.titre}</td>
                                <td>${line.datePret}</td>
                                <td>${line.dateRetour === null ? 'Non rendu' : line.dateRetour}</td>
                                <td>${line.dateRetour === null ? '<button onclick="enregistrer_rendu(' + line.id + ')" class="btn btn-sm btn-success">Rendre</button>' : ''}</td>
                               </tr>`);
        });
    });
}