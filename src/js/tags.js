(function () {
    const $ = selector => document.querySelector(selector);
    const $$ = selector => document.querySelectorAll(selector);
    const $$$ = (element, event, handler) => element.addEventListener(event, handler);
    const $$$$ = (father, son) => father.querySelector(son);

    const tagsInput = $('#tags_input');

    if(tagsInput) {
        let tags = [];
        // Escuchar los cambios en el input
        $$$(tagsInput, 'keypress', guardarTag);

        function guardarTag(e) {
            if(e.target.value.trim() === ''|| e.target.value < 1) return;

            if(e.keyCode === 44) {
                e.preventDefault();
                tags = [...tags, e.target.value.trim()];
                tagsInput.value = '';
                console.log(tags);
            }
        }
    }
})();