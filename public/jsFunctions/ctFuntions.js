function ajaxFormSubmit(
    actionUrl,
    submissionType,
    formData,
    form,
    submitButton
) {
    $(form).on("click", submitButton, function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: actionUrl,
            method: submissionType,
            data: formData,
            // beforeSend: ()=>{
            //   loaderselector.fadeIn();

            // },
            success: (output) => {
                // loaderselector.fadeOut();
                console.log(output);

                // let result=JSON.parse(output);
                console.log("result is", output);
                if (output["status"] == "1") {
                    swal("Status Changed!", output["message"], "success", {
                        buttons: false,
                        timer: 1500,
                    });
                    // window.location.reload();
                } else if (output[0] == "error") {
                    swal("Failed!", output[1], "error").then(() => {
                        callback();
                    });
                } else {
                    // loaderselector.fadeOut();
                }
            },
            error: (err) => {
                swal("Failed!", "Oops Something Went Wrong", "error");
            },
        });
    });
}
