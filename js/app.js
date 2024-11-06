$(document).ready(function () {
    fetchSCPSubjects();

    // Fetch SCP Subjects
    function fetchSCPSubjects() {
        $.ajax({
            url: 'read.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                const tbody = $('#scpTable tbody');
                tbody.empty();
                data.forEach(subject => {
                    tbody.append(`
                        <tr>
                            <td>${subject.id}</td>
                            <td>${subject.scp_number}</td>
                            <td>${subject.object_class}</td>
                            <td>${subject.containment_procedures}</td>
                            <td>${subject.description}</td>
                            <td>
                                <button class="btn btn-warning btn-sm edit" data-id="${subject.id}">Edit</button>
                                <button class="btn btn-danger btn-sm delete" data-id="${subject.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Add New SCP Subject
    $('#addNew').on('click', function () {
        $('#scpModalLabel').text('Add New SCP Subject');
        $('#scpForm')[0].reset();
        $('#scpId').val('');
        $('#scpModal').modal('show');
    });

    // Save SCP Subject
    $('#scpForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'save.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                alert(response);
                fetchSCPSubjects();
                $('#scpModal').modal('hide');
            },
            error: function (xhr, status, error) {
                console.error('Error saving data:', error);
                alert('An error occurred while saving the SCP subject.');
            }
        });
    });

    // Edit SCP Subject
    $(document).on('click', '.edit', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'read.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                const subject = data.find(s => s.id == id);
                if (subject) {
                    $('#scpModalLabel').text('Edit SCP Subject');
                    $('#scpId').val(subject.id);
                    $('#scp_number').val(subject.scp_number);
                    $('#object_class').val(subject.object_class);
                    $('#containment_procedures').val(subject.containment_procedures);
                    $('#description').val(subject.description);
                    $('#scpModal').modal('show');
                } else {
                    alert('Subject not found.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching subject:', error);
            }
        });
    });

    // Delete SCP Subject
    $(document).on('click', '.delete', function () {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: { id },
                success: function (response) {
                    alert(response);
                    fetchSCPSubjects();
                },
                error: function (xhr, status, error) {
                    console.error('Error deleting data:', error);
                }
            });
        }
    });
});
