(function ($) {
    $.fn.filemanager = function (type, options) {
        type = type || "file";

        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix ? options.prefix : "/filemanager";
            var target_input = $("#" + $(this).data("input"));
            window.open(
                route_prefix + "?type=" + type,
                "FileManager",
                "width=900,height=600"
            );
            window.SetUrl = function (items) {
                var file_path = items
                    .map(function (item) {
                        let relative_url = item.url.replace(`${app_url}/`, "");
                        return relative_url;
                    })
                    .join(",");

                // set the value of the desired input to image url
                target_input.val("").val(file_path).trigger("change");
            };
            return false;
        });
    };
})(jQuery);

document.querySelectorAll(".ckeditor-classic").forEach((editor) => {
    CKEDITOR.replace(editor, {
        filebrowserBrowseUrl: `${app_url}/laravel-filemanager?type=Files`,
        filebrowserUploadUrl:
            "{{ route('file.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: "form",
    });
});


