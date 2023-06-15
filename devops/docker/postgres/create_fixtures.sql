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