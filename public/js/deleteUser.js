const deleteUser = document.querySelector('.delete-user-button');

deleteUser.addEventListener('click', (e) => {
    e.preventDefault();
    const role = e.target.getAttribute('role');
    const result = confirm('Are you sure you want to delete your account?');
    if (result) {
        url = (role !== null ? "/student/delete-account" : "/delete-account");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        })
        $.ajax({
            url,
            type: "DELETE",
            success: function (response) {
                window.location.href = "/signin";
            },
            error: function (response) {
                console.log(response);
            }
        })
    } else {
        e.preventDefault()
    }
})
