import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RegisterComponent } from './components/pages/eletronic-point/register/register.component';
import { RecordsComponent } from './components/pages/eletronic-point/records/records.component';
import { ValidateComponent } from './components/pages/eletronic-point/validate/validate.component';
import { LoginComponent } from './components/pages/auth/login/login.component';
import { HomeComponent } from './components/pages/home/home.component';
import { AuthGuard } from './guards/auth.guard';

const routes: Routes = [
  {
    path: 'home',
    component: HomeComponent
  },
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'registros',
    component: RecordsComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'RENATOMALDONADO/registrar',
    component: RegisterComponent
  },
  {
    path: 'RENATOMALDONADO/validar/:id',
    component: ValidateComponent,
    canActivate: [AuthGuard]
  },
  {
    path: '',
    redirectTo: '/home',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
