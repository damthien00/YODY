$(document).ready(function () {
    // Sự kiện click cho phần tử upload-area
    $(document).on("click", ".upload-area", function () {
        // Tìm input tương ứng và kích hoạt sự kiện click trên nó
        $(this).siblings("input[type='file']").trigger("click");
    });

    // Sự kiện change cho input file
    $(document).on("change", "input[type='file']", function (event) {
        if (event.target.files) {
            let filesAmount = event.target.files.length;
            let $uploadImg = $(this).siblings(".upload-img");
            console.log($uploadImg);
            let $uploadInfoValue = $(this).siblings(".upload-info-value");

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

    // Sự kiện click cho nút xóa
    $(document).on("click", ".remove-btn", function () {
        $(this).parent().remove();
    });
});
