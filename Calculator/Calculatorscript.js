class Calculator {
    display = document.getElementsByClassName('screen')[0];
    stack = [];

    clear() {
        //This function clears the screen//
        this.display.value ='0';
    }
    enter() {

        this.stack.push(this.display.value);
        this.clear();
    }
    numberHandel(number) {
        if( this.display.value ==="0" ) {
           this.display.value ="" 
        }
        this.display.value += String(number);
    }
        

    operatorHandel(operator) {
var value1 = parseInt(this.stack.pop());
var value2 = parseInt(this.stack.pop());
        if(operator === "*")
            this.display.value = String(value1*value2);
            else if ( operator === "/")
                this.display.value = String((value1)/(value2));
            else if ( operator === "+")
                    this.display.value = String((value1)+(value2));
            else if ( operation === "-")
                this.display.value = String((value1)-(value2));
        

    }
    calculate() {
        document.addEventListener('click', (event) => {

            const {
                target
            } = event;

            if (target.classList.contains('number')) {
                this.numberHandel(target.value);
            } else if (target.classList.contains('operator')) {

                this.operatorHandel(target.value);

            } else if (target.classList.contains('clear')) {

                this.clear();

            } else if (target.classList.contains('enter')) {

            this.enter();

            }
        });
    }

}

document.addEventListener('DOMContentLoaded', function () {
    //created a new calculator object//
    calculator = new Calculator();
    //Used a function from this object//
    calculator.clear();
    calculator.calculate();

});