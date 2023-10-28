import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.page.html',
  styleUrls: ['./formulario.page.scss'],
})
export class FormularioPage implements OnInit {
  datos: any = {
    documento: '',
    nombre: '',
    telefono: '',
    comercio: '',
    correo: '',
    tipo_id: '',
    plan_id: '',
  };

  constructor(
    private http: HttpClient,
    private alertController: AlertController
  ) {}

  ngOnInit() {}

  guardarFormulario() {
    const datos = new FormData();

    datos.append('documento', this.datos.documento);
    datos.append('nombre', this.datos.nombre);
    datos.append('telefono', this.datos.telefono);
    datos.append('comercio', this.datos.comercio);
    datos.append('correo', this.datos.correo);
    datos.append('tipo_id', this.datos.tipo_id.toString()); // Asegúrate de convertir a cadena si es un número

    datos.append('plan_id', this.datos.plan_id.toString()); // Asegúrate de convertir a cadena si es un número

    // Realizar la solicitud POST
    this.http
      .post('http://localhost/Appionic2023/controller/guardar.php', datos)
      .subscribe(
        (snap) => {
          console.log(snap);
          this.mostrarAlerta(
            'Registro Exitoso',);
        },
        (error) => {
          console.error('Error:', error);
        }
      );
  }

  async mostrarAlerta(titulo: string) {
    const alert = await this.alertController.create({
      header: titulo,
      buttons: ['Aceptar'],
    });

    await alert.present();
  }
}
