import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from './../../../../services/http/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  credentials = {
    email: '',
    password: ''
}

showMessageError: boolean = false;

constructor(private authService: AuthService, private router: Router) { }

ngOnInit(): void {
}

submit(){
  this.authService.login(this.credentials)
      .subscribe((data) => {
        this.router.navigate(['registros'])
      }, () => this.showMessageError = true);
  return false;

}

}
