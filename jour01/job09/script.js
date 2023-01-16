
const test = [2, 50, 45, 24, 18, 155, 365, 1, 30, 55]

function tri(array, ordre) {

        if(ordre == 'asc') {
                
                for(let x = 0; x < array.length; x++) {

                        for(let y = 0; y < array.length; y++) {

                                if(array[x] < array[y]) {

                                        temp = array[x]

                                        array[x] = array[y]

                                        array[y] = temp
                                }
                        }
                }
        }

        else if(ordre == 'desc') {

                for(let x = 0; x < array.length; x++) {

                        for(let y = 0; y < array.length; y++) {

                                if(array[x] > array[y]) {

                                        temp = array[x]

                                        array[x] = array[y]

                                        array[y] = temp
                                }
                        }
                }
                
        }

        return array    

}


document.write(tri(test, 'asc'))

