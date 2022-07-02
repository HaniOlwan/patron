const deleteUser = document.querySelector('.delete-user-button');

deleteUser.addEventListener('click', (e) => {
    const result = confirm('Are you sure you want to delete your account?');
    if (result) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        })
        $.ajax({
            url: "/delete-account",
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
