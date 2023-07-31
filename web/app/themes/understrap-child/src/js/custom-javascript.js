// Add your custom JS here.
document.addEventListener('DOMContentLoaded', () => {
    const references = document.querySelectorAll('.reference');

    references.forEach(reference => {
        const body = reference.querySelector('.reference-body');
        /** @type {string} */
        const text = body.innerText;
        const original = body.innerHTML;
        const words = text.replace(/\n/g, ' ').split(' ');

        if( words.length > 80 ) {
            const excerptArr = words.slice(0, 80);
            const readMoreEl = document.createElement('a');
            
            // Add ... to the last word
            excerptArr[excerptArr.length - 1] = excerptArr[excerptArr.length - 1] + '...';
            
            const excerpt = `<p>${excerptArr.join(' ').replaceAll('  ', '</p><p>')}</p>`;

            readMoreEl.innerText = 'Meer lezen';
            readMoreEl.href = 'javascript:void(0)';
            readMoreEl.classList.add('read-more');
            readMoreEl.dataset.expanded = false;

            body.innerHTML = excerpt;
            reference.appendChild(readMoreEl);

            readMoreEl.addEventListener('click', () => {
                readMoreEl.dataset.expanded = readMoreEl.dataset.expanded === 'true' ? false : true;

                if( readMoreEl.dataset.expanded === 'true' ) {
                    body.innerHTML = original;
                    readMoreEl.innerText = 'Minder lezen';
                } else {
                    body.innerHTML = excerpt;
                    readMoreEl.innerText = 'Meer lezen';
                }
            })
        }
    })
})