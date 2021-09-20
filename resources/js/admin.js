require('./bootstrap');

const deleteForm = document.querySelectorAll('.confirmDelete');

deleteForm.forEach(item => {
    item.addEventListener('submit', function(e) {
        const resp = confirm('Do you want to delete this post?');

        if(!resp){
            e.preventDefault();
        }
    })
});