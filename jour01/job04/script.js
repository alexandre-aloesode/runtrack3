function bisextile(year) {

    if((year % 4 == 0)) {

        console.log(year + ' est une année bisextile')
        return true

    }

    else {

        console.log(year + ' n\'est pas une année bisextile')
        return false

    }

    
}

for(y = 1950; y <= 2024; y++) {

    bisextile(y)
}