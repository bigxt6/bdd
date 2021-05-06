const close_alert = (cssSelector) => {
    $(cssSelector)
        .removeClass('alert-success')
        .removeClass('alert-danger')
        .hide();
}

const enregistrer_rendu = (id) => {
    $.ajax({
        url: './traitement/enregistrer-rendu.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id
        },
        success: () => {
            $('.alert > span').text('Ouvrage rendu avec succès !');
            $('.alert').addClass('alert-success').show();
        },
        error: () => {
            $('.alert > span').text('Une erreur est survenue, veuillez  réessayer.');
            $('.alert').addClass('alert-danger').show();
        }
    }).always(rafraichir_liste_prets);
}