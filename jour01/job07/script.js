function jourtravaille(date) {

    let jour = new Date(date).toLocaleDateString("fr", { weekday: 'long' })

    let numero_jour = new Date(date).toLocaleDateString("fr", { day: 'numeric' })

    let mois = new Date(date).toLocaleDateString("fr", { month: 'long' })

    let annee = new Date(date).toLocaleDateString("fr", { year: 'numeric' })

    if((numero_jour == 01) && (mois == 'janvier' || mois == 'mai' || mois == 'juin' || mois == 'décembre')) 
    console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 13 && mois == 'avril') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 08 && mois == 'mai') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 21 && mois == 'mai') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 14 && mois == 'juillet') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 15 && mois == 'août') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 11 && mois == 'novembre') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(numero_jour == 25 && mois == 'decembre') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour férié')

    else if(jour == 'samedi' || jour == 'dimanche') console.log('Le ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un week-end')

    else console.log('Oui, ' + jour + ' ' + numero_jour + ' ' + mois + ' ' + annee + ' est un jour travaillé')

}


function get_input_date() {

let input_date = document.getElementById('date_input').value


console.log(input_date)


jourtravaille(input_date)

}
