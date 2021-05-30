import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { EletronicPointHttpService } from './../../../../services/http/eletronic-point-http.service';
import { EletronicPoint } from './../../../../models';

@Component({
  selector: 'app-validate',
  templateUrl: './validate.component.html',
  styleUrls: ['./validate.component.css']
})
export class ValidateComponent implements OnInit {

  register_id!: number;
  register!: EletronicPoint;

  showMessageError: boolean = false;
  showMessageSuccess: boolean = false;

  constructor(private route: ActivatedRoute, private eletronicPointHttp: EletronicPointHttpService) { }

  ngOnInit(): void {
    this.route.params.subscribe(params => {
      this.register_id = params.id
      this.getRegister();
    })
  }

  getRegister(){
    this.eletronicPointHttp
      .get(this.register_id)
      .subscribe(response => {
            this.register = response
            console.log(this.register);
      })
  }

  submit(id: number | undefined){

    if(typeof id === "number"){
      this.eletronicPointHttp
        .validate(id)
        .subscribe(response => {
          this.showMessageSuccess = true;
          this.getRegister();
        }, error => {
          this.showMessageError = true
        });
    }

  }

}
