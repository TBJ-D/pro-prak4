window.onload = () => {

    const pagecontainer = document.getElementById('pagecontainer');
    const childnodes = pagecontainer.childNodes;

    let textElements = [];
    const elements = ["SPAN", "H1", "P"];
    function isTextElement(node) {
        // als element een text-element is voeg hem toe aan een array.
        if (elements.includes(node.nodeName)) {
            textElements.push(node);
        }
    }

    // Functie om alle tekst elementen uit de html te halen

    function checkDeep(node) {
        isTextElement(node);
        // Loop door children van html node
        if (node.childNodes.length > 0) {
            node.childNodes.forEach(node => {
                checkDeep(node);
            })
        }
    }

    childnodes.forEach(node => {
        checkDeep(node);
    });
    
    // voeg click event listener toe aan alle text-elementen
    textElements.forEach(el => {
        el.addEventListener('click', () => {
            // prompt de gebruiker voor nieuwe tekst inhoud/styling
            let input = prompt('Voer nieuwe tekst in');
            el.textContent = input;
            let colorInput = prompt('Voer nieuwe tekstkleur in (null om huidige te behouden)');
            if (colorInput != "null") el.style.color = colorInput;
            let backgroundInput = prompt('Voer nieuwe achtergrondkleur in (null om huidige te behouden)');
            if (backgroundInput != "null") el.style.backgroundColor = backgroundInput;
        })
    })
    let mainElements = document.querySelectorAll("main");
    // behaal geselecteerde pagina uit de URL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const page = urlParams.get('page');

    $('#savechanges').click(function () {

        let html = document.getElementById('pagecontainer').innerHTML;

        // sla wijzigingen op door een post request te sturen naar update.php

        $.ajax({
            type: "POST",
            url: `update.php?table=pagecontent&row=content&key=${page}&identifier=pagename`,
            data: { data: html }
        }).done(function (msg) {
            alert("Data Saved: " + msg);
        });

    });
}