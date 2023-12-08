CREATE TABLE IF NOT EXISTS categoria (
    nu_seq_categoria serial PRIMARY KEY,
    nome VARCHAR NOT NULL
);

CREATE TABLE IF NOT EXISTS parcela (
    nu_seq_parcela serial PRIMARY KEY,
    total INTEGER DEFAULT 0,
    pago INTEGER DEFAULT 0
);

CREATE TABLE IF NOT EXISTS meses_pagos(
    nu_seq_meses_pagos serial PRIMARY KEY,
    dt_pagamento TIMESTAMP NOT NULL,
    nu_seq_parcela INTEGER,

    CONSTRAINT fk_nu_seq_parcela FOREIGN KEY(nu_seq_parcela) REFERENCES parcela(nu_seq_parcela)
);

CREATE TABLE IF NOT EXISTS situacao(
   nu_seq_situacao serial PRIMARY KEY,
   descricao VARCHAR NOT NULL
);

CREATE TABLE IF NOT EXISTS perfil(
     nu_seq_perfil INTEGER PRIMARY KEY,
     nome VARCHAR NOT NULL,
     receita DECIMAL NOT NULL,
     nu_seq_usuario INTEGER NOT NULL,
     nu_seq_conta INTEGER
);

CREATE TABLE IF NOT EXISTS conta (
   nu_seq_conta serial PRIMARY KEY,
   nome VARCHAR NOT NULL,
   valor DECIMAL NOT NULL,
   mes_divida TIMESTAMP NOT NULL,
   nu_seq_situacao INTEGER NOT NULL,
   nu_seq_categoria INTEGER NOT NULL,
   nu_seq_perfil INTEGER NOT NULL,

   CONSTRAINT fk_nu_seq_perfil FOREIGN KEY(nu_seq_perfil) REFERENCES perfil(nu_seq_perfil),
   CONSTRAINT fk_nu_seq_categoria FOREIGN KEY(nu_seq_categoria) REFERENCES categoria(nu_seq_categoria),
   CONSTRAINT fk_nu_seq_situacao FOREIGN KEY(nu_seq_situacao) REFERENCES situacao(nu_seq_situacao)
);

alter table parcela
    add nu_seq_conta integer not null,
    add constraint fk_nu_seq_conta
        foreign key (nu_seq_conta) references conta (nu_seq_conta);

alter table perfil
    add CONSTRAINT fk_nu_seq_conta FOREIGN KEY(nu_seq_conta) REFERENCES conta(nu_seq_conta)
