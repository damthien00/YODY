$(document).ready(function () {
    // Sự kiện click cho phần tử upload-area
    $(document).on("click", ".upload-area", function () {
        // Tìm input tương ứng và kích hoạt sự kiện click trên nó
        $(this).siblings("input[type='file']").trigger("click");
    });

    // Sự kiện change cho input file
    $(document).on("change", "input[type='file']", function (event) {
        let uploadType = $(this).data("upload-type");
        if (event.target.files) {
            let filesAmount = event.target.files.length;
            let $uploadImg = $(this).siblings(".upload-img");
            let $uploadInfoValue = $(this).siblings(".upload-info-value");
            if (uploadType === "replace") {
                $uploadImg.html("");
            }
            for (let i = 0; i < filesAmount; i++) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    let html = `
                        <div class="uploaded-img">
                            <img src="${event.target.result}">
                            <button type="button" class="remove-btn">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m289.94 256 95-95A24 24 0 0 0 351 127l-95 95-95-95a24 24 0 0 0-34 34l95 95-95 95a24 24 0 1 0 34 34l95-95 95 95a24 24 0 0 0 34-34z"></path></svg>
                            </button>
                        </div>
                    `;
                    $uploadImg.append(html);
                };
                reader.readAsDataURL(event.target.files[i]);
            }

            $uploadInfoValue.text(filesAmount);
            $uploadImg.css("padding", "20px");
        }
    });

    $(document).on("click", ".btn-save-image", function () {
        let activeImgSrc = $(".uploaded-img.active img").attr("src");
        const image_id = $("#upload-version").val();
        const image_input_id = $("#upload-version-input").val();
        $(`#${image_id} svg`).css("display", "none");
        let imgElement = $("<img>").attr("src", activeImgSrc);

        $(`#${image_id}`).append(imgElement);
        $(`#${image_input_id}`).val(activeImgSrc);
    });

    // Sự kiện click cho nút xóa
    $(document).on("click", ".remove-btn", function () {
        $(this).parent().parent().remove();
    });
});
