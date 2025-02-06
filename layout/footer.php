</div>

<!--**********************************
            Content body end
        ***********************************-->

<!--**********************************
            Footer start
        ***********************************-->
<!-- <div class="footer">
    <div class="copyright">
        <p>Copyright © Developed by <a href="https://miracodes.com/" target="_blank">Introvert Solution</a> 2023</p>
    </div>
</div> -->
<!--**********************************
            Footer end
        ***********************************-->

</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<script src="vendor/tagify/dist/tagify.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="vendor/datatables/js/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/js/buttons.html5.min.js"></script>
<script src="vendor/datatables/js/jszip.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>
<script src="vendor/draggable/draggable.js"></script>
<script src="vendor/dropzone/dist/dropzone.js"></script>

<script src="js/custom.js"></script>
<script src="js/deznav-init.js"></script>
<script src="js/demo.js"></script>
<script src="js/styleSwitcher.js"></script>

</body>


</html>

<script>
    setTimeout(() => {
        $(".sidebar-right-trigger").hide();
    }, 500);

    function upload(id) {

        $(id).click();

    }

    $(document).ready(function() {

        $(".sidebar .toggle").click();

        setTimeout(() => {
            document.body.classList.add('loaded');
        }, 1000);
    })

    function uploadFile(elem, prefix) {
        document.getElementById(prefix + '_preview').src = window.URL.createObjectURL(elem.files[0]);
        document.getElementById(prefix + '_file_post').value = 1;
    }
</script>

<script>
    function editInfo(index) {

        var $inputs = $('#frm-row :input');

        $("#frm-row").attr('action', 'functions/edit.php');
        $(".add-btns").attr('hidden', true);
        $(".edit-btns").attr('hidden', false);

        $(".multi-form").hide();
        $(".multi-form-copy").remove();

        $inputs.each(function() {

            let name = this.name;
            let type = this.type;

            let data = $("#td-" + index + "-" + name.replace('[]', '')).html();

            console.log("#td-" + index + "-" + name.replace('[]', ''));

            if ($(this).hasClass('editable')) {

                $(this).val(data);

            }

            if (type == 'file') {

                $("#" + name + "_preview").attr('src', 'upload/' + data)
            }

        });
    }

    function cancelEdit() {

        $("#frm-row").attr('action', 'functions/post.php');
        $(".add-btns").attr('hidden', false);
        $(".edit-btns").attr('hidden', true);

        $(".multi-form").show();

    }

    function deleteInfo(table, field, id) {

        if (confirm("Are you sure you want to delete this?")) {

            $.post('functions/delete.php', {
                'table': table,
                'field': field,
                'id': id
            }, function(result) {
                console.log(result)
                location.reload();
            })

        }

    }

    function openAddModal(table) {

        $("#frm-row")[0].reset();

        $("#form-table").val('tbl_' + table);

        if ($("#addNewModal") != undefined) {

            $(".btn-add-modal").show();
            $(".btn-edit-modal-functions").hide();

        }
    }
</script>

<script>
    $(document).ready(function() {

        if ($(".actual-datetime").length > 0) {
            setInterval(() => {
                let currentdate = new Date();

                let month = (currentdate.getMonth() + 1 < 10) ? "0" + (currentdate.getMonth() + 1) : (currentdate.getMonth() + 1);
                let day = (currentdate.getDate() < 10) ? "0" + (currentdate.getDate()) : (currentdate.getDate());
                let hours = (currentdate.getHours() < 10) ? "0" + (currentdate.getHours()) : (currentdate.getHours());
                let min = (currentdate.getMinutes() < 10) ? "0" + (currentdate.getMinutes()) : (currentdate.getMinutes());

                var datetime = currentdate.getFullYear() + "-" +
                    month + "-" +
                    day + " " +
                    hours + ":" +
                    min;

                // console.log(datetime);

                $(".actual-datetime").val(datetime);
            }, 1000);
        }
    });
</script>