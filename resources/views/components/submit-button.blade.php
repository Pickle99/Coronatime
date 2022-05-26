<div>
    <button type="submit" {{$attributes->merge(['class' => 'w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-extrabold text-white bg-greener hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'])}}>{{strtoupper($slot)}}</button>
</div>
