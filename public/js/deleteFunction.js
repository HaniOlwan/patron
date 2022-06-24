const token = document.querySelector('meta[name="_token"]').content;
const deleteBtn = document.querySelector('.delete_record');
const deleteIcon = document.querySelector('.delete_icon');

deleteIcon.addEventListener('click', (e) => {
    var selectedId = e.target.getAttribute('data-id');
    deleteBtn.setAttribute('data-id', selectedId);
    var url = e.target.getAttribute('data-url');
    deleteBtn.setAttribute('data-url', url);
})

deleteBtn.addEventListener('click', (e) => {
    const item_id = e.target.getAttribute('data-id');
    const item_url = e.target.getAttribute('data-url');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });

    $.ajax({
        url: '/' + item_url + '/' + item_id,
        type: 'DELETE',
        success: function (result) {
            if (result.success) {
                if (item_url === 'subject') {
                    history.back()
                } else {
                    window.location.reload();
                }
            }
        },
        error: function (result) {
            console.log("Some error occured")

        }
    });
})