(function ($) {
    var CheckboxDropdown = function (el) {
        var _this = this;
        this.isOpen = false;
        this.$el = $(el);
        this.isSingleOption = this.$el.data("control") === "single-option"; // Kiểm tra dropdown chỉ chọn một tùy chọn
        this.$label = this.$el.find(".dropdown-label");
        // this.$labelOptions = this.$el.find(".dropdown-option");
        this.$quantitySelect = this.$el.find(".quantity-select");
        this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
        this.$inputs = this.$el.find('[type="checkbox"]');
        this.onCheckBox();

        this.$label.on("click", function (e) {
            e.preventDefault();
            _this.toggleOpen();
        });

        this.$checkAll.on("click", function (e) {
            e.preventDefault();
            _this.onCheckAll();
        });

        this.$inputs.on("change", function (e) {
            _this.onCheckBox();
        });

        if (this.isSingleOption) {
            // Nếu dropdown là dropdown chỉ chọn một tùy chọn
            this.$inputs.on("change", function (e) {
                var $selectedOption = $(this);
                _this.selectSingleOption($selectedOption);
            });
        }
    };

    CheckboxDropdown.prototype.onCheckBox = function () {
        this.updateStatus();
    };

    CheckboxDropdown.prototype.updateStatus = function () {
        var checked = this.$el.find(":checked");

        if (!this.isSingleOption) {
            // Cập nhật trạng thái tương ứng với dropdown có checkbox
            this.$checkAll.html("Chọn tất cả");

            if (checked.length <= 0) {
                this.$quantitySelect.html("");
            } else if (checked.length === 1) {
                this.$quantitySelect.html(checked.parent("label").text());
            } else if (checked.length === this.$inputs.length) {
                this.$quantitySelect.html("All Selected");
                this.$checkAll.html("Hủy chọn tất cả");
            } else {
                this.$quantitySelect.html(checked.length + " Selected");
            }
        } else {
            $(".dropdown-option").on("click", function () {
                var selectedOption = $(this).text().trim();
                var selectedValue = $(this).data("value");
                var $dropdown = $(this).closest(".dropdown");
                // Hiển thị tùy chọn được chọn trong dropdown cụ thể
                $dropdown.find(".dropdown-label").text(selectedOption);
                $dropdown.find(".dropdown-input").val(selectedValue); // Tìm ô input liền kề của dropdown và đặt giá trị
                var dropdownInstance = $dropdown.data("dropdown-instance");
                if (dropdownInstance && dropdownInstance.isOpen) {
                    dropdownInstance.closeDropdown();
                }
            });
        }
    };

    CheckboxDropdown.prototype.onCheckAll = function (checkAll) {
        if (!this.isSingleOption) {
            // Xử lý chọn tất cả cho dropdown có checkbox
            if (!this.areAllChecked || checkAll) {
                this.areAllChecked = true;
                this.$checkAll.html("Uncheck All");
                this.$inputs.prop("checked", true);
            } else {
                this.areAllChecked = false;
                this.$checkAll.html("Chọn tất cả");
                this.$inputs.prop("checked", false);
            }
            this.updateStatus();
        }
    };
    CheckboxDropdown.prototype.closeDropdown = function () {
        this.isOpen = false;
        this.$el.removeClass("on");
        $(document).off("click");
    };

    // if (this.isSingleOption) {
    //     // Nếu dropdown là dropdown chỉ chọn một tùy chọn
    // }
    CheckboxDropdown.prototype.toggleOpen = function (forceOpen) {
        var _this = this;

        if (!this.isOpen || forceOpen) {
            // Đóng tất cả các dropdown khác trước khi mở dropdown này
            $('[data-control="checkbox-dropdown"]').each(function (
                index,
                element
            ) {
                if (element !== _this.$el[0]) {
                    var dropdownInstance = $(element).data("dropdown-instance");
                    if (dropdownInstance && dropdownInstance.isOpen) {
                        dropdownInstance.toggleOpen();
                    }
                }
            });

            this.isOpen = true;
            this.$el.addClass("on");
            $(document).on("click", function (e) {
                if (!$(e.target).closest("[data-control]").length) {
                    _this.toggleOpen();
                }
            });
        } else {
            this.isOpen = false;
            this.$el.removeClass("on");
            $(document).off("click");
        }
    };

    CheckboxDropdown.prototype.selectSingleOption = function ($selectedOption) {
        // Xử lý chọn tùy chọn đơn lẻ
        this.$inputs.prop("checked", false);
        $selectedOption.prop("checked", true);

        this.updateStatus();
        this.toggleOpen(false);
    };

    var checkboxesDropdowns = document.querySelectorAll(
        '[data-control="checkbox-dropdown"], [data-control="single-option"]'
    );
    for (var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
        var dropdownInstance = new CheckboxDropdown(checkboxesDropdowns[i]);
        $(checkboxesDropdowns[i]).data("dropdown-instance", dropdownInstance);
    }
})(jQuery);
