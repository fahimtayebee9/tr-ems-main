<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    

        <div class="form-group">
            
            
            {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
        </div>

        <div class="form-group">
            
            {{-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> --}}
        </div>

        <div class="form-group">
            
            {{-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            
        </div>
    </form>
</section>
