package com.example.pragunsharma.loginregister;

/**
 * Created by PragunSharma on 29/01/16.
 */
public class User {

    String name,username, password;
    int age;

    public User(String name, int age, String username, String password) {
        this.name = name;
        this.password = password;
        this.age = age;
        this.username = username;

    }

    public User(String username, String password) {

        this.username = username;
        this.password = password;
        this.age = -1;
        this.name = "";

    }





}
