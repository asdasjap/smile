<x-dashboard>
    {{-- button
    
    container div

        left div
            list item > data + button
            list item > data + button
            list item > data + button
        left /div

        right div    
            list item > data + button
            list item > data + button
            list item > data + button
        right /div

    container /div --}}
    <button type="submit">add exercise</button>
    
    <div class="form__container">
        <form class="form__submit" action="/exercise/add" method="POST">
            @csrf
            <div class="header__block" data-id="1">
                <label for="header1" class="header__label">
                    HEADER
                    <button class="add__header">+</button>
                    <br>
                    <input type="text" id="header1">
                    
                </label>
                <br>
                <label  class="add__step__block" for="header1__step1">
                    STEP <br>
                    <input type="text" id="header1__step1">
                    <button class="add__step">+</button>
                </label>
                
            </div>
        </form>


        <button class="addExerciseBtn bg-red-500">SUBMIT</button>

    </div>

    <div class="container__exercise"> 
        <div class="left">
            <div class="items">
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">Breathing Exercises: Nostril Breathing</span>
                </div>
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="items">
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
                <div class="item">
                    <button class="del">del</button>
                    <span class="exercise__name">exercise</span>
                </div>
            </div>
        </div>
    </div>



{{-- 
    <div class="form__container">
        <div class="form__submit">
            <div class="header__block">
                <label for="header__input1" class="header__label">
                    HEADER
                    <button class="add__header">+</button>
                    <br>
                    <input type="text" id="header__input1">
                    
                </label>
                <br>
                <label for="header1__step1">
                    STEP <br>
                    <input type="text" id="header1__step1">
                </label>
                <button class="add__step">+</button>
            </div>
        </div>
    </div> --}}

    <script>
        const headerBtn = document.querySelector('.add__header');
        const stepBtn = document.querySelectorAll('.add__step');
        const form = document.querySelector('.form__submit');
        
        const btnSubmit = document.querySelector('.addExerciseBtn')
        btnSubmit.addEventListener('click', () => form.submit());
        let blockCounter = 1;
        let step = [1];

        form.addEventListener('click', function(event) {
            event.preventDefault()
            if(event.target.classList.contains('add__header')){
                blockCounter++
                const newBlock = `
                <br> <br> <br> 
                    <div class="header__block" data-id="${blockCounter}">
                        <label for="header${blockCounter}" class="header__label">
                            HEADER
                            <button class="add__header">+</button>
                            <br>
                            <input type="text" id="header${blockCounter}">
                            
                        </label>
                        <br>
                        <label class="add__step__block" for="header${blockCounter}__step1">
                            STEP <br>
                            <input type="text" id="header${blockCounter}__step1">
                            <button class="add__step">+</button>
                        </label>
                    </div>
                `
                form.insertAdjacentHTML('beforeend' , newBlock);
                
                step.push(1);
            }


            if(event.target.classList.contains('add__step')) {
                currentHeader = event.target.closest('.header__block');
                currentBlock = currentHeader.dataset.id;
                step[currentBlock - 1] += 1
                const stepBlock = `
                 <br> 
                    <label class="add__step__block" for="header${currentBlock}__step${step[currentBlock - 1]}">   
                        STEP <br>
                        <input type="text" id="header${currentBlock}__step${step[currentBlock - 1]}">
                        <button class="add__step">+</button>
                    </label>
                    
                    `
                currentHeader.insertAdjacentHTML('beforeend' ,stepBlock);
            }

            console.log(step)
        })

    </script>
</x-dashboard>