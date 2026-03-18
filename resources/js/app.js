import './bootstrap';
import 'flowbite';
import { DataTable } from "simple-datatables";
import Alpine from 'alpinejs';

// En ajoutant cette ligne, le gris disparaîtra et DataTable sera accessible partout
window.DataTable = DataTable; 

window.Alpine = Alpine;
Alpine.start();