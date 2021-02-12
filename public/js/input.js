function maxAmountOfCharactersIninput(input){


    let max = 120;
        let Input = document.getElementById(input);
        let inputCounter = document.getElementById('charcounter');
        Input.addEventListener('keypress',function(e){
            if (e.which < 0x20){
                return;
            }
            inputCounter.textContent = max - this.value.length;
            if (this.value.length == max){
                e.preventDefault();
            }else if(this.value.length > max){
                this.value = this.value.substring(0,max);
            }

        });

        Input.addEventListener('keydown',function (event){
            let key  = event.keyCode || event.charCode;
            if(key == 8 || key == 46){
                inputCounter.textContent = max - this.value.length;
            }
        })

        Input.addEventListener('keyup',function (event){

            inputCounter.textContent = max - this.value.length;
        })

    }

   let summary =  'summary_textarea';
    maxAmountOfCharactersIninput(summary);
