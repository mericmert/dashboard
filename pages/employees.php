<div class="table-container">
    <button id="add-employee">Add Employee</button>
    <table style="width:100%" id="table_id" class="display">
        <thead class="table-header">
            <tr>
                <th>Fullname</th>
                <th>Age</th>
                <th>Salary</th>
                <th>Off-day</th>
                <th>Contract Time</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody id="employee-body"> </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        fetchEmployees();
        setInterval(() => {
            fetchEmployees();
        }, 5000);
        function fetchEmployees() {
            $.ajax({
                type:"GET",
                url:"../CRUD/fetch_employees.php",
                dataType:"html",
                success: function(response){
                    $("#employee-body").html(response);
                }
            })
        }
        $('#table_id').DataTable({
            "oLanguage": {
                "sSearch": "Search:"
            },
        });
        $('#add-employee').click(function () {
            $("#employee-modal").modal("setting", {
                closable: false,
                onApprove: function () {
                    return true;
                }
            }).modal("show");
        });
        $("#confirm-employee").click(function() {
            var data = {
                fullname: $("#fullname").val(),
                age: $("#age").val(),
                salary: $("#salary").val(),
                dayoff: $("#dayoff").val(),
                contract_time: $("#contract_time").val(),
                submit: $("#submit").val()
            }
            $.ajax({
                type: "POST",
                url: "../CRUD/add_employee.php",
                data: data,
            });
            fetchEmployees();
        })
    
        $(document).delegate('.trash', 'click', function () {
            var del_id = $(this).parent().attr("id");
            $.ajax({
                type:"POST",
                url:"../CRUD/delete_employee.php",
                data : {
                    id: del_id
                }
            })
            fetchEmployees();
        })
    });
   
</script>