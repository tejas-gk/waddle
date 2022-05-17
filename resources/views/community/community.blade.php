

<div>
    
  
    @livewireStyles
    <input type="text" placeholder="livewire"  wire:model='email'/>
         {{-- @error('email') <span class="error">{{ $message }}</span> @enderror --}}
         <button wire:click="count">Say Hi</button>
        
 @livewireScripts
     {{ $email }}
     {{$count}}
   
 
</div>
