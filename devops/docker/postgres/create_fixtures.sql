CREATE TABLE IF NOT EXISTS scopes (
    nu_seq_scopes serial PRIMARY KEY,
    ds_scope VARCHAR (15) NOT NULL
);

CREATE TABLE IF NOT EXISTS authorization_serve (
   nu_seq_authorization_serve serial PRIMARY KEY,
   client_id VARCHAR NOT NULL,
   secret VARCHAR NOT NULL,
   redirect_uri VARCHAR (225) NOT NULL,
   nu_seq_scopes INTEGER NOT NULL,
   CONSTRAINT fk_nu_seq_scopes FOREIGN KEY(nu_seq_scopes) REFERENCES scopes(nu_seq_scopes)
);

CREATE TABLE IF NOT EXISTS users
(
    nu_seq_users serial PRIMARY KEY,
    username     VARCHAR(25) NOT NULL UNIQUE,
    email        VARCHAR(70) NOT NULL UNIQUE,
    password     VARCHAR     NOT NULL,
    scopes       INTEGER[]
);

-- insert into authorization_serve values (
--     DEFAULT,
--     '459580faac276b13c9ddb60d480c34f795aa5dabb8df4655e5a0d793d0b41c9a',
--     '1614aed6e5adb9f44d8c56370a9f77cb0940c221c4e14cdc86444576dae7af9d',
--     'http://myfinance.com.br:3030/check',
--     2
-- );
-- insert into scopes values (DEFAULT, 'create');
-- insert into scopes values (DEFAULT, 'read');
-- insert into scopes values (DEFAULT, 'update');
-- insert into scopes values (DEFAULT, 'delete');