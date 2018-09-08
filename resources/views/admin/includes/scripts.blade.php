<script src="{{ asset('public/js/manifest.js') }}"></script>
<script src="{{ asset('public/js/vendor.js') }}"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
<script src="{{ asset('public/js/fontawesome-all.min.js') }}"></script>
<script src="{{ asset('public/js/bootbox.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>

<script>
    function split(value) {
        return value.split(',');
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(document).ready(function () {
        /* 顯示上傳檔案名字 */
        $("input[type='file']").change(function(e) {
            $(this).parent().find('.file-name').html(e.target.files[0].name);
        });

        /* 候選字：產地 */
        let regionsSearch = "{{ route('regions.search') }}";
        $('#region').autocomplete({
            minLength: 2,
            delay: 500,
            source: function (request, response) {
                $.ajax({
                    url: regionsSearch,
                    dataType: 'json',
                    data: {
                        term: extractLast(request.term)
                    },
                    success: function (data) {
                        response(data);
                    },
                });
            },
            select: function (event, ui) {
                const terms = split(this.value);
                terms.pop();
                terms.push(ui.item.value);
                this.value = terms.join(',');
                return false;
            },
        });

        /* 候選字：酒廠 */
        let makersSearch = "{{ route('makers.search') }}";
        $('#maker').autocomplete({
            minLength: 2,
            delay: 500,
            source: function (request, response) {
                $.ajax({
                    url: makersSearch,
                    dataType: 'json',
                    data: {
                        term: extractLast(request.term)
                    },
                    success: function (data) {
                        response(data);
                    },
                });
            },
            select: function (event, ui) {
                const terms = split(this.value);
                terms.pop();
                terms.push(ui.item.value);
                this.value = terms.join(',');
                return false;
            },
        });

        /* 候選字：品種 */
        let varietiesSearch = "{{ route('varieties.search') }}";
        $('#variety').autocomplete({
            minLength: 1,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: varietiesSearch,
                    dataType: 'json',
                    data: {
                        term: extractLast(request.term)
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                const terms = split(this.value);
                terms.pop();
                terms.push(ui.item.value);
                this.value = terms.join(',');
                return false;
            },
        });

        /* 候選字：品牌 */
        let brandsSearch = "{{ route('brands.search') }}";
        $('#brand').autocomplete({
            minLength: 2,
            delay: 500,
            source: function (request, response) {
                $.ajax({
                    url: brandsSearch,
                    dataType: 'json',
                    data: {
                        term: extractLast(request.term)
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                const terms = split(this.value);
                terms.pop();
                terms.push(ui.item.value);
                this.value = terms.join(',');
                return false;
            },
        });

        /* 候選字：標記 */
        let tagsSearch = "{{ route('tags.search') }}";
        $('#tag').autocomplete({
            minLength: 1,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: tagsSearch,
                    dataType: 'json',
                    data: {
                        term: extractLast(request.term)
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                const terms = split(this.value);
                terms.pop();
                terms.push(ui.item.value);
                this.value = terms.join(',');
                return false;
            },
        });
    });

    /* 互動視窗 */
    $(document).on('click', ":input[data-toggle='confirm']", function (e) {
        let form = $(this).closest('form');
        bootbox.confirm({
            message: '確定執行？',
            buttons: {
                confirm: {
                    label: '是',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '否',
                    className: 'btn-primary'
                }
            },
            callback: function (result) {
                console.log('This was logged in the callback: ' + result);
                if (result == true)
                    form.submit();
            }
        });
    });

    /* 警報關閉按鈕 */
    $(document).on('click', '.close', function () {
        $('.alert').alert('close');
    });

    /* 文字編輯器 */
    $('#content').ckeditor();
    $('#description').ckeditor();
</script>