<div>
    <div class="p-2">
        <form class="form-horizontal" wire:submit.prevent='login'>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email" placeholder="Ingrese su Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password"
                placeholder="ingrese su Contraseña">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mt-4">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Inicie Sesión</button>
            </div>
        </form>
    </div>
</div>
