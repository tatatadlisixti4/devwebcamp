(function () {
    const $ = selector => document.querySelector(selector);
    const $$ = selector => document.querySelectorAll(selector);
    const $$$ = (element, event, handler) => element.addEventListener(event, handler);
    const $$$$ = (father, son) => father.querySelector(son);

    const tagsInput = $('#tags_input');

    if(tagsInput) {
        const tagsDiv = $('#tags');
        const tagsInputHidden = $('[name="tags"]');

        let tags = [];
        // Escuchar los cambios en el input
        $$$(tagsInput, 'keypress', guardarTag);

        function guardarTag(e) {
            if(e.target.value.trim() === ''|| e.target.value < 1) return;

            if(e.keyCode === 44) {
                e.preventDefault();
                tags = [...tags, e.target.value.trim()];
                tagsInput.value = '';
                mostrarTags();
            }
        }

        function mostrarTags() {
            tagsDiv.textContent = '';
            tags.forEach(tag => {
                const etiqueta = document.createElement('LI');
                etiqueta.classList.add('formulario__tag');
                etiqueta.textContent = tag;
                etiqueta.ondblclick = eliminarTag;
                tagsDiv.appendChild(etiqueta);
            });
            actualizarInputHidden();
        }

        function eliminarTag(e) {
            e.target.remove();
            tags = tags.filter(tag => tag !== e.target.textContent);
            actualizarInputHidden();
            console.log(tags);

        }
        function actualizarInputHidden() {
            tagsInputHidden.value = tags.toString();
        }
    }
})();