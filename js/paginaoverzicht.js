window.onload = () => {
    const pagecontainer = document.getElementById('pagecontainer');
    const childnodes = pagecontainer.childNodes;
    let textElements = [];
    const elements = ["SPAN", "H1", "P"];
    function isTextElement(node) {
        if (elements.includes(node.nodeName)) {
            textElements.push(node);
        }
    }
    function checkDeep(node) {
        isTextElement(node);

        if (node.childNodes.length > 0) {
            node.childNodes.forEach(node => {
                checkDeep(node);
            })
        }
    }

    childnodes.forEach(node => {
        checkDeep(node);
    });
    console.log(textElements);

    textElements.forEach(el => {
        el.addEventListener('click', () => {
            var input = prompt('Voer nieuwe tekst in');
            el.textContent = input;

        })
    })
    let mainElements = document.querySelectorAll("main");

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const page = urlParams.get('page');
    $('#savechanges').click(function () {
        let html = document.getElementById('pagecontainer').innerHTML;
        console.log(html);
        $.ajax({
            type: "POST",
            url: `update.php?table=pagecontent&row=content&key=${page}&identifier=pagename`,
            data: { data: html }
        }).done(function (msg) {
            alert("Data Saved: " + msg);
        });
    });
}