<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
    
        <button class="bg-primary-600 px-4 py-1 font-bold rounded text-white mt-4" type="submit">
            Enviar
        </button>
    </form>

</div>
