import './bootstrap';
import 'flowbite';
import { DataTable } from "simple-datatables";
import Alpine from 'alpinejs';

window.DataTable = DataTable; 

window.Alpine = Alpine;
Alpine.start();