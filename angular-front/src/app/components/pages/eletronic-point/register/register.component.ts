import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { EletronicPointHttpService } from './../../../../services/http/eletronic-point-http.service';


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  form!: FormGroup;
  formSubmited = false;

  showMessageError: boolean = false;
  showMessageSuccess: boolean = false;
  messages: Array<string> = [];

  constructor(private eletronicPointHttp: EletronicPointHttpService, private formBuilder: FormBuilder) {
      this.form = this.formBuilder.group({
        name: ['', [Validators.required, Validators.maxLength(100)]],
        email: ['', [Validators.required,  Validators.maxLength(100)]],
        cpf: ['', [Validators.required, Validators.maxLength(11), Validators.minLength(11)]],
        cell: ''
      })
  }

  ngOnInit(): void {
  }

  submit(){
    this.eletronicPointHttp
      .create(this.getData())
      .subscribe(response => {
        this.messages.splice(0, 5);
        this.formSubmited = true;

      }, error => {
        this.showMessageError = true;
        this.messages.splice(0, 5);
        this.getErros(error);
      })
  }

  getData(): Object{
    const BrM = require('br-masks');
    let data = {
      name: this.form.controls.name.value,
      email: this.form.controls.email.value,
      cpf: BrM.cpf(this.form.controls.cpf.value),
      cell: BrM.phone(this.form.controls.cell.value)
    }

    return data
  }

  getErros(error: any){

      if(error.error.errors.cpf !== undefined){
        this.messages.push(error.error.errors.cpf[0]);
      }
      if(error.error.errors.name !== undefined){
        this.messages.push(error.error.errors.name[0]);
      }
      if(error.error.errors.email !== undefined){
        this.messages.push(error.error.errors.email[0]);
      }
  }

}
