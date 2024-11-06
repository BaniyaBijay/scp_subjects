<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1>SCP Subject Management</h1>
        <div class="mb-4">
            <button class="btn btn-primary" id="addNew">Add New SCP Subject</button>
        </div>
        <table class="table table-striped" id="scpTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SCP Number</th>
                    <th>Object Class</th>
                    <th>Containment Procedures</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated here -->
            </tbody>
        </table>
    </div>

    <!-- Modal for Add/Edit SCP Subject -->
    <div class="modal fade" id="scpModal" tabindex="-1" aria-labelledby="scpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scpModalLabel">Add/Edit SCP Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="scpForm">
                        <input type="hidden" name="id" id="scpId">
                        <div class="form-group">
                            <label for="scp_number">SCP Number</label>
                            <input type="text" class="form-control" id="scp_number" name="scp_number" required>
                        </div>
                        <div class="form-group">
                            <label for="object_class">Object Class</label>
                            <input type="text" class="form-control" id="object_class" name="object_class" required>
                        </div>
                        <div class="form-group">
                            <label for="containment_procedures">Containment Procedures</label>
                            <textarea class="form-control" id="containment_procedures" name="containment_procedures" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
