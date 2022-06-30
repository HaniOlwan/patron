const token = document.querySelector('meta[name="_token"]').content;
const modaleDelete = document.querySelector('.delete_modal');
const deleteBtn = document.querySelector('.delete_btn');

if (deleteBtn) {
    deleteBtn.addEventListener('click', (e) => {
        var subjectId = e.target.getAttribute('subject-id');
        modaleDelete.setAttribute('subject-id', subjectId);
        var selectedId = e.target.getAttribute('data-id');
        modaleDelete.setAttribute('data-id', selectedId);
        var url = e.target.getAttribute('data-url');
        modaleDelete.setAttribute('data-url', url);
    })

}

const deleteIcon = document.querySelector('.delete_icon');

if (deleteIcon) {
    deleteIcon.addEventListener('click', (e) => {
        var subjectId = e.target.getAttribute('subject-id');
      
        modaleDelete.setAttribute('subject-id', subjectId);
        var selectedId = e.target.getAttribute('data-id');
        modaleDelete.setAttribute('data-id', selectedId);
        var url = e.target.getAttribute('data-url');
        modaleDelete.setAttribute('data-url', url);
    })
}

if (modaleDelete) {
    modaleDelete.addEventListener('click', (e) => {
        const item_id = e.target.getAttribute('data-id');
        const item_url = e.target.getAttribute('data-url');
        const subjectId = e.target.getAttribute('subject-id');
        console.log(item_id, item_url, subjectId)
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
                        window.location.href='/subjects';
                    } else if (item_url === 'topic') {
                        window.location.href = "/question-bank/" + subjectId
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
}
