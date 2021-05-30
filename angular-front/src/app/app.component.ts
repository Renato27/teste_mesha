import { Component, OnInit } from '@angular/core';
import { AuthService } from './services/http/auth.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'angular-front';

  constructor(public authService: AuthService) {}

  ngOnInit(): void{
  }

  canShowNavBar(){
    return this.authService.isAuth();
  }
}
