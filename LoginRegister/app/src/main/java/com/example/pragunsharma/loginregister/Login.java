package com.example.pragunsharma.loginregister;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class Login extends AppCompatActivity implements View.OnClickListener {

    android.widget.Button bLogin;
    EditText etUsername, etPassword, etSeatnumber;
    TextView tvRegisterlink;
    UserLocalStore userLocalStore;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        etUsername = (EditText) findViewById(R.id.etUsername);
        etPassword = (EditText) findViewById(R.id.etPassword);
        etSeatnumber = (EditText) findViewById(R.id.etSeatNumber);
        bLogin = (android.widget.Button) findViewById(R.id.bLogin);
        tvRegisterlink = (TextView) findViewById(R.id.tvRegisterlink);
        bLogin.setOnClickListener(this);
        tvRegisterlink.setOnClickListener(this);

        userLocalStore = new UserLocalStore(this);


    }

    @Override
    public void onClick(View v) {
        switch(v.getId()) {
            case R.id.bLogin:
                User user= new User(null, null);
                userLocalStore.storeUserData(user);
                userLocalStore.setUserLoggedIn(true);


                break;
            case R.id.tvRegisterlink:
                startActivity(new Intent(this, Register.class));
                break;

        }
    }
}


