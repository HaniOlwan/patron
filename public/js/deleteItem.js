const token = document.querySelector('meta[name="_token"]').content;


const subjectDeleteBtn = document.querySelector('.delete_record');

const subjectDeleteIcon = document.querySelector('.delete_icon');
subjectDeleteIcon.addEventListener('click', (e) => {
    var selectedId = e.target.getAttribute('data-subject-id');
    subjectDeleteBtn.setAttribute('data-subject-id', selectedId);
})

subjectDeleteBtn.addEventListener('click', (e) => {
    const subject_id = e.target.getAttribute('data-subject-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });

    $.ajax({
        url: '{{ URL::to("/subject") }}/' + subject_id,
        type: 'DELETE',
        success: function (result) {
            if (result.success) {
                window.location.reload();
            }
        },
        error: function (result) {
            console.log("Some error occured")

        }
    });
})

const deleteButton = document.querySelector('.delete_record');

const deleteIcon = document.querySelector('.delete_icon');
deleteIcon.addEventListener('click', (e) => {
    var selectedId = e.target.getAttribute('data-topic-id');
    deleteButton.setAttribute('data-topic-id', selectedId);
})

deleteButton.addEventListener('click', (e) => {
    const topic_id = e.target.getAttribute('data-topic-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });
    $.ajax({
        url: '/topic/' + topic_id,
        type: 'DELETE',
        success: function (result) {
            if (result.success) {
                window.location.reload();
            }
        },
        error: function (result) {
            console.log("Some error occured")
        }
    });
})


const questionDeleteIcon = document.querySelector('.question_delete_icon');
questionDeleteIcon.addEventListener('click', (e) => {
    var selectedId = e.target.getAttribute('data-question-id');
    deleteButton.setAttribute('data-question-id', selectedId);
})

deleteButton.addEventListener('click', (e) => {
    const question_id = e.target.getAttribute('data-question-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });

    $.ajax({
        url: '/question/' + question_id,
        type: 'DELETE',
        success: function (result) {
            if (result.success) {
                window.location.reload();
            }
        },
        error: function (result) {
            console.log("Some error occured")
        }
    });
})



const topicDeleteBtn = document.querySelector('.delete_record');

const topicDeleteIcon = document.querySelector('.delete_icon');
topicDeleteIcon.addEventListener('click', (e) => {
    var selectedId = e.target.getAttribute('data-topic-id');
    topicDeleteBtn.setAttribute('data-topic-id', selectedId);
})

topicDeleteBtn.addEventListener('click', (e) => {
    const topic_id = e.target.getAttribute('data-topic-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });
    $.ajax({
        url: '{{ URL::to("/topic") }}/' + topic_id,
        type: 'DELETE',
        success: function (result) {
            if (result.success) {
                history.back()
            }
        },
        error: function (result) {
            console.log("Some error occured")
        }
    });
})