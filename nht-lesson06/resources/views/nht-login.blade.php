<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHT - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <form action=""method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h1>NHT_Login</h1>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="nhtEmail" class="form-label">Email </label>
                        <input type="email" class="form-control" 
                            id="nhtEmail" name="=nhtEmail"
                            placeholder="nhtEmail@example.com"/>
                        <span id="email-error"></span>
                    </div> 
                    <div class="mb-3">
                        <label for="nhtPass" class="form-label">password </label>
                        <input type="password" class="form-control" 
                            id="nhtPass" name="nhtPass"
                            placeholder="xxxx"/>
                        <span id="email-error"></span>
                    </div> 

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">submit</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>