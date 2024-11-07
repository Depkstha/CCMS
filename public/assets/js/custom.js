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

document.querySelectorAll(".choices-select").forEach((element) => {
    const placeholderValue = element.getAttribute("placeholder");
    const choices = new Choices(element, {
        silent: false,
        items: [],
        choices: [],
        renderChoiceLimit: -1,
        maxItemCount: -1,
        closeDropdownOnSelect: "auto",
        singleModeForMultiSelect: false,
        addChoices: false,
        addItems: true,
        addItemFilter: (value) => !!value && value !== "",
        removeItems: true,
        removeItemButton: true,
        removeItemButtonAlignLeft: false,
        editItems: false,
        allowHTML: false,
        allowHtmlUserInput: false,
        duplicateItemsAllowed: true,
        delimiter: ",",
        paste: true,
        searchEnabled: true,
        searchChoices: true,
        searchFloor: 1,
        searchResultLimit: 4,
        searchFields: ["label", "value"],
        position: "auto",
        resetScrollPosition: true,
        shouldSort: true,
        shouldSortItems: false,
        shadowRoot: null,
        placeholder: placeholderValue ? true : false,
        placeholderValue: placeholderValue,
        searchPlaceholderValue: "Search option...",
        prependValue: null,
        appendValue: null,
        renderSelectedChoices: "auto",
        loadingText: "Loading...",
        noResultsText: "No results found",
        noChoicesText: "No choices to choose from",
        itemSelectText: "Press to select",
        uniqueItemText: "Only unique values can be added",
        customAddItemText:
            "Only values matching specific conditions can be added",
        addItemText: (value) => {
            return `Press Enter to add <b>"${value}"</b>`;
        },
        removeItemIconText: () => `Remove item`,
        removeItemLabelText: (value) => `Remove item: ${value}`,
        maxItemText: (maxItemCount) => {
            return `Only ${maxItemCount} values can be added`;
        },
        valueComparer: (value1, value2) => {
            return value1 === value2;
        },
    });
});

$(".clone-container").on("click", ".clone", function () {
    const $clone = $(this).closest(".clone-section").clone(true);
    $clone.find("label").remove();
    $clone.find('input[type="text"]').val("");
    $clone.find("textarea").val("");
    $clone.appendTo(".clone-container");
});

$(".clone-container").on("click", ".declone", function () {
    let count = $(".clone-container").find(".clone-section").length;
    if (count > 1) {
        $(this).closest(".clone-section").remove();
    }
});
