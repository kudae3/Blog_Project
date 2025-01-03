<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center py-3">Login Form</h3>
                <div class="card p-4 my-3 shadow">
                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3">
                          <label for="email" class="form-label">Email address</label>
                          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value={{old('email')}}>
                          <x-error-msg name="email" />
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input name="password" type="password" class="form-control" id="password">
                          <x-error-msg name="password" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
