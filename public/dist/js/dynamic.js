var dept={
    Development:['Manager','Developer'],
    QualityAssurance: ['Manager','Test Engineer']
}

var main = document.getElementById('main_menu');
var sub = document.getElementById('sub_menu');

//Trigger the event when main menu change occurs

main.addEventListener('change',function () {
    //getting a selected option
        var selected_option = dept[this.value];

    //removing the sub menu options using while loop
        while (sub.options.length > 0){
            sub.options.remove(0)
        }
    //cover the selected object into array and create an options for each array elements
    //using Option Constructor, it will create element with the given value and innerText

    Array.from(selected_option).forEach(function (e1) {
        let option = new Option(e1,e1);

        sub.appendChild(option);
    })
});